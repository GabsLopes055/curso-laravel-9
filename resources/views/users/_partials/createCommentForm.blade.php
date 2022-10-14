@csrf
<div class="d-flex justify-content-center">
    <textarea class="form-control" name="comment" id="comment" cols="30" rows="10" placeholder="Comentários">{{ $comment->body ?? old('comment') }}</textarea>
</div>
<div class="mt-1">
    <input class="form-check-input" type="checkbox" id="visible" name="visible"
        @if (isset($comment) and $comment->visible == 1) checked @endif>
    </input>
    <label class="form-check-label " for="flexSwitchCheckDefault">Visível</label>
</div>
<button class="btn btn-outline-success opacity-50 w-100 mt-4" type="submit">Enviar</button>
