@extends('layouts.app')

@section('content')
@include('admin.users.sidebar')
<div class="my-content1">

    <div class="card p-lg-4 p-md-3 p-2">

            <div class="">

                @if (session('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{route('admin.import.bulkmail')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="control-label">Send Bulk Email</label>
                        <select class="form-control" onChange="handleOnChangeUserType(this.value)">
                            <option value="0" selected>Select</option>
                            <option value="upload_file" >Upload File</option>
                            <option value="contacts" >Contacts</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Subject</label>
                        <input type="text" class="form-control" id="message_subject" name="message_subject" />
                    </div>

                    <div id="user_type_upload_file" class="form-group">
                        <label class="control-label">Upload File</label>
                        <div class="upload-file">
                            <input type="file" id="bulk_message_file" name="bulk_message_file"/>
                            <label for="bulk_message_file">
                                <a href="{{ asset('uploads/bulk_mail.xlsx') }}" download>Download Sample File</a>
                            </label>
                        </div>
                    </div>

                    <div id="user_type_contacts" class="form-group">
                        <label class="control-label">Select Contacts</label>
                        <select class="form-control" name="user_type_contacts[]" multiple>
                            @foreach ($users as $item)
                                <option value="{{$item->id}}">{{ucfirst($item->name)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Select an image</label>
                        <input type="file" class="form-control" id="message_attachment" name="message_attachment" />
                    </div>

                    <div class="form-group">
                        <label class="control-label">Select Schedule</label>
                        <select class="form-control" id="message_schedule" name="message_schedule" onChange="handleOnChangeSchedule(this.value)">
                            <option value="0" disabled selected>Select</option>
                            <option value="send_now" >Select Now</option>
                            <option value="mark_schedule" >Mark A Schedule</option>
                        </select>
                    </div>

                    <div id="schedule_date_time" class="form-group">
                        <label class="control-label">Date &amp; Time</label>
                        <input type="text" id="mark_schedule" name="mark_schedule" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Message</label>
                        <select class="form-control" onChange="handleOnChangeMessage(this.value)">
                            <option value="0" disabled selected>Select</option>
                            <option value="custom_message" >Custom Message</option>
                            <option value="template_message" >Template Message</option>
                        </select>
                    </div>

                    <div id="template_message" class="form-group">
                        <label class="control-label">Select Template</label>
                        <select class="form-control" onChange="handleOnChangeTemplate(this.value)">
                            @foreach ($templates as $item)
                                <option value="{{$item->id}}">{{ucfirst($item->title)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Message</label>
                        <textarea class="form-control" rows="8" id="custom_message" name="custom_message"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>

                </form>

            </div>
        </div>
    </div>
@endsection
