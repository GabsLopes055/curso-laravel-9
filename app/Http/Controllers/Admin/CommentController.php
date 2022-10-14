<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index($userID)
    {

        if (!$user = $this->user->find($userID)) {
            return redirect()->back();
        }

        $comments = $user->comments()->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userID)
    {
        if (!$user = $this->user->find($userID)) {
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $userId)
    {

        if (!$user = $this->user->find($userId)) {
            return redirect()->back();
        }

        if (!empty($request->comment)) {

            if ($request['visible'] == 'on') {
                $request['visible'] = true;
            } else {
                $request['visible'] = false;
            }

            if ($user->comments()->create([
                'body' => $request->comment,
                'visible' => $request->visible
            ])) {
                notify()->success('Comentário Criado !', 'Sucesso !');
                return redirect()->route('comments.index', $user->id);
            }
        } else {
            notify()->error('Campos Vazios !', 'Erro');
            return redirect()->back();
        }
    }

    public function edit($userId, $commentId)
    {

        if (!$comment = $this->comment->find($commentId)) { // restaga o comentário do usuário
            return redirect()->back();
        } else {
            $user = $this->user->find($userId); // resgato o usuário atravez do id passado pela url
            // dd($user->name);
            return view('users.comments.edit', compact('user', 'comment'));
        }
    }

    public function update(Request $request, $commentId)
    {
        if (!$comment = $this->comment->find($commentId)) { // restaga o comentário do usuário
            return redirect()->back();
        } else {

            if (!empty($request->comment)) {
                if ($request['visible'] == 'on') {
                    $request['visible'] = true;
                } else {
                    $request['visible'] = false;
                }

                if ($comment->update([
                    'body' => $request->comment,
                    'visible' => $request->visible
                ])) {
                    notify()->warning('Comentário Editado !', 'Sucesso !');
                    return redirect()->route('comments.index', $comment->user_id);
                } else {
                    notify()->error('Erro ao Editar Usuário !', 'Erro !');
                    return redirect()->route('comments.index', $comment->user_id);
                }
            } else {
                notify()->warning('Preencha todos os Campos !', 'Campos Vazios !');
                    return redirect()->back();
            }
        }
    }
}
