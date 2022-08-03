@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h3>Are You Sure Want To Exit ?</h3>
                <table>
                    <td style="width: 20px;">
                        <a type="button" class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="window.history.go(-1); return false;" href="">No</a>
                    </td>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
