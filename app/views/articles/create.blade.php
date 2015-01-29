<h1>Create New Article</h1>

@if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

{{ Form::open(['route' => 'articles.store']) }}
		@include('articles.form', array('article' => $article))
{{ Form::close() }}

{{link_to('/articles', 'Back')}}