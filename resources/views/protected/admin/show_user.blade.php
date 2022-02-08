@extends('protected.admin.master')

@section('title', 'View Profile')

@section('content')
    <div class="page-bar page-top-bar">
        
        <ul class="page-breadcrumb" >
            <li>
                <i class="fa fa-home" style="color:black;"></i>
                <a href="{{URL::route('admin_dashboard')}}" >Home</a>
                <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
           
            <li>
                <a href="{{URL('/admin/profiles')}}">User Management</a>
                 <i class="fa fa-angle-right" style="color:black;"></i>
            </li>
            <li>
                User Profile
            </li>
        </ul>
        <a href="{{URL('admin/description-manage')}}" class="btn green-haze btn-circle pull-right back-btn"><i class="fa fa-backward"></i> Back</a>
    </div>
<div class="card user-prof">
    <h3>{{ $user->first_name }}'s Profile</h3>
        <table class="profile-table" style="width:100%">
            <tr>
                <td>Account Type:</td>
                <td>{{ $user_role }}</td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td>{{ $user->last_name }}</td>
            </tr>           
            <tr>
                <td>Contact:</td>
                <td>{{ $user_details->customers?$user_details->customers->telephone:'' }}</td>
            </tr>
            <tr>
                <td>Owner email:</td>
                <td>{{ $user_details->companies?$user_details->companies->owner_email:'' }}</td>
            </tr>
            <tr>
                <td>Owner Contact:</td>
                <td>{{ $user_details->companies?$user_details->companies->owner_contact:'' }}</td>
            </tr>
        </table>
        

    @if(Sentinel::check())
        <div class="edit-btn">
            <a href='{{ $user->id }}/edit' class='btn btn-primary'>Edit Profile</a>
        </div>
        </div>
    @endif

@endsection