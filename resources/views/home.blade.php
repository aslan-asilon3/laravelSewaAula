@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <h3>Anda yakin ingin logout ?</h3>
                <table>
                    <td style="width: 20px;">
                        <a type="button" class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Ya') }}
                     </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="window.history.go(-1); return false;" href="">TIdak</a>
                    </td>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
