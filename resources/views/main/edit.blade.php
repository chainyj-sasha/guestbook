<form action="" method="POST">
    @csrf
    <textarea name="text" id="" cols="30" rows="10">{{ $message->text }}</textarea>
    <input type="submit" name="button">
</form>
