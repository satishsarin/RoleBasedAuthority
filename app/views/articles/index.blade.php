@extends('layouts.master')

@section('title') Login @stop

@section('content')
<div class="col-md-4 col-md-offset-4">
  <div class="panel panel-default">
    <div class="panel-heading">
            <h3 class="panel-title">List Articles</h3>
    </div>
    <div class="panel-body">
      @if ($errors->has())
              @foreach ($errors->all() as $error)
                <div class='alert-danger alert'>{{ $error }}</div>
              @endforeach
      @endif

			{{link_to('/articles/create', 'New Article')}}
			<table class="table table-bordered">
				<tr>
					<th>S.No</th>
					<th>Title</th>
					<th>content</th>
					<th colspan="2">Functions</th>
				</tr>
				<?php $count = 0; ?>
				@foreach($articles as $article)
					<?php $count++; ?>
					<tr>
						<td>{{$count}}</td>
						<td>{{ $article->title }}</td>
						<td>{{ $article->body }}</td>
						<td>{{ link_to("/articles/{$article-> id}/edit", "Edit") }}</td>
						<td>
							 	{{ Form::open(array('route' => array('articles.destroy', $article->id), 'method' => 'delete')) }}
	      					<button type="submit" >Delete</button>
	  					 	{{ Form::close() }}
						</td>
					</tr>
				@endforeach	
			</table>
		</div>
  </div>
</div>
@stop









