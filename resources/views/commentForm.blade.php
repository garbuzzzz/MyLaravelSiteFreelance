<form action="" method="POST">
    @csrf
    <p>{{ Auth::user()->name }}, write your comment:</p>
    <textarea style="width: 700px; height:300px; border: 1px solid burlywood" name="comment"></textarea>
    <input type="submit" value="Add comment" name="submit">
</form>


