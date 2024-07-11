@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit Application</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('application.update', $application) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="applicationId" class="col-md-4 col-form-label text-md-right" hidden>Application
                                    ID</label>

                                <div class="col-md-6">
                                    <input id="applicationId" type="text"
                                        class="form-control @error('applicationId') is-invalid @enderror"
                                        name="applicationId" value="{{ $application->applicationId }}" required
                                        autocomplete="applicationId" hidden autofocus>

                                    @error('applicationId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                        class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                        value="{{ $application->firstname }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middlename" class="col-md-4 col-form-label text-md-right">Middlename</label>

                                <div class="col-md-6">
                                    <input id="middlename" type="text"
                                        class="form-control @error('middlename') is-invalid @enderror" name="middlename"
                                        value="{{ $application->middlename }}" required autocomplete="middlename" autofocus>

                                    @error('middlename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Lastname</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="{{ $application->lastname }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $application->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        value="{{ $application->phone }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ $application->address }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="city" type="text"
                                        class="form-control @error('city') is-invalid @enderror" name="city"
                                        value="{{ $application->city }}" required autocomplete="city">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>

                                <div class="col-md-6">
                                    <select id="state" class="form-control @error('state') is-invalid @enderror"
                                        name="state" value="" required>
                                        <option value="{{ $application->state }}">{{ $application->state }}</option>
                                    </select>
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lga" class="col-md-4 col-form-label text-md-right">LGA</label>

                                <div class="col-md-6">
                                    <select id="lga" onfocus="populateLGAs()"
                                        class="form-control @error('lga') is-invalid @enderror" name="lga"
                                        value="{{ old('lga') }}" required>
                                        <option value="{{ $application->lga }}">{{ $application->lga }}</option>
                                    </select>
                                    @error('lga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nationality" class="col-md-4 col-form-label text-md-right">Nationality</label>
                                <div class="col-md-6">
                                    <input id="nationality" type="text"
                                        class="form-control @error('nationality') is-invalid @enderror"
                                        name="nationality" value="{{ $application->nationality }}" required
                                        autocomplete="nationality">
                                    @error('nationality')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                <div class="col-md-6">
                                    <select id="sel" onfocus="populateGenderSelect()"
                                        class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        value="">
                                        <option value="{{ $application->gender }}">{{ $application->gender }}</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="maritalStatus" class="col-md-4 col-form-label text-md-right">Marital
                                    Status</label>
                                <div class="col-md-6">
                                    <select id="maritalStatus" onfocus="populateMaritalStatus()"
                                        class="form-control @error('maritalStatus') is-invalid @enderror"
                                        name="maritalStatus" value="">
                                        <option value="{{ $application->maritalStatus }}">
                                            {{ $application->maritalStatus }}</option>
                                    </select>
                                    @error('maritalStatus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="religion" class="col-md-4 col-form-label text-md-right">Religion</label>
                                <div class="col-md-6">
                                    <select id="religion" onfocus="populateReligion()"
                                        class="form-control @error('religion') is-invalid @enderror" name="religion"
                                        value="{{ old('religion') }}">
                                        <option value="{{ $application->religion }}">{{ $application->religion }}
                                        </option>
                                    </select>
                                    @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fslc"
                                    class="col-md-4 col-form-label text-md-right">FSLC-Certificate</label>

                                <div class="col-md-6">
                                    @if ($application->fslc)
                                        <img src="{{ asset('images/fslc/' . $application->fslc) }}" alt="Image"
                                            width="70px" height="70px">
                                    @endif
                                    <input id="fslc" type="file"
                                        class="form-control @error('fslc') is-invalid @enderror" name="fslc"
                                        accept="jpg, jpeg, png, svg" value="{{ old('fslc', $application->fslc) }}">
                                    @error('fslc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="olevel"
                                    class="col-md-4 col-form-label text-md-right">Olevel-Certificate</label>
                                <div class="col-md-6">
                                    @if ($application->olevel)
                                        <img src="{{ asset('images/olevel/' . $application->olevel) }}" alt="Image"
                                            width="70px" height="70px">
                                    @endif
                                    <input id="olevel" type="file"
                                        class="form-control @error('olevel') is-invalid @enderror" name="olevel"
                                        accept="jpg, jpeg, png, svg" value="{{ $application->olevel }}">

                                    @error('olevel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row col-md-4">
                                <button class="btn btn-primary" type="submit">Update Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/asset/scripts.js') }}"></script>
@endsection
