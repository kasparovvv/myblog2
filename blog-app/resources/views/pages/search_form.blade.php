<form action="{{ route('blog') }}" method="GET">
    <div class="form-group">
        <input type="text" class="form-control" name="query" placeholder='Search  in Posts' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
        <button type="button " button="submit" class="btn_1">search</button>
    </div>
</form>