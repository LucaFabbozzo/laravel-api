@extends('layouts.app')

@section('content')
    <div class="container w-50 m-auto text-center pt-2 text">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{session('message')}}
             </div>
         @endif
         <h1 class="fs-4 py-3">Types controls</h1>
           <form  action="{{route('admin.types.store')}}" method="POST">
            @csrf
            <div class="input-group my-4 w-50 m-auto">
                <input type="text" class="form-control" name="name" placeholder="Add new type">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                <i class="fa-solid fa-plus me-2"></i>Add</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Projects Count</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($types as $type )
                <tr>
                    <td>
                        <form action="{{ route('admin.types.update', $type) }}" method="post" class="d-flex align-items-center justify-content-center">
                            @csrf
                            @method('PATCH')
                            <input type="text" class="border-0 p-2 rounded me-1" name="name" value="{{ $type->name }}">
                            <button type="submit" class="btn btn-outline-warning">Update</button>
                        </form>

                    </td>
                    <td>{{ count($type->types) }}</td>
                    <td>
                        @include('admin.partials.form-delete', [
                            'route' => 'types',
                            'message' => "Confirm delete of this type: $type->name ?",
                            'entity' => $type
                        ])
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4"><h3>No result</h3></td>
                </tr>
                @endforelse
            </tbody>
     </table>
    </div>
@endsection

@section('title')

@endsection
