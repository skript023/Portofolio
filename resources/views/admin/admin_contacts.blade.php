@extends('admin.template_helper.template_helper')
@section('title', 'Contact Manager')
@section('breadcrumb', 'Contact Manager')
@section('header', 'Contact Manager')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{  $contact->name  }}</td>
                                <td>{{  $contact->email  }}</td>
                                <td>{{  $contact->message  }}</td>
                                <td>{{  $contact->date  }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection