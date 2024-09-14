@extends('user::admin.layout.app')
@section('title', 'forms lists')
@section('content')
<section class="section">
    @include('user::admin.layout.message')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive ">
                    <h5 class="card-title">forms Lists
                        @if (auth()->user()->can('Form Create'))
                        <a href="{{ url('blog/admin/form/create') }}" class="btn btn-info text-right">Create+</a>
                        @endif
                        

                    </h5>

                    <table class="table table-responsive table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Url</th>
                                <th scope="col">View</th>
                                <th scope="col">Domain</th>
                                <th scope="col">FormFields</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($forms->count() > 0)
                            @foreach ($forms as $key => $form)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $form->form_name }}</td>
                                <td>{{ $form->form_url }}</td>
                                <td>{{ $form->form_views }}</td>
                                <td>{{ $form->form_domain }}</td>
                                <td>{{$form->form_fields}}</td>
                                <td>
                                    @if (auth()->user()->can('Form Edit'))
                                    <a href="{{ url('blog/admin/form') }}/{{ $form->id }}" class="btn btn-xs btn-warning">E</a>
                                    @endif
                                    @if (auth()->user()->can('Form Delete'))
                                    <form action="{{ url('blog/admin/form') }}/{{ $form->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">D</button>
                                    </form>
                                    @endif
                                    <a href="{{ url('form-submissions/export') }}/{{$form->id}}" class="btn btn-info text-right">Download</a>
                                </td>
                            </tr>
                            @endforeach
                            {{ $forms->links() }}
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection