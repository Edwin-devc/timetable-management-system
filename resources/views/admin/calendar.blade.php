@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Calendar
                </div>

                <div class="card-body">
                    <!-- Display success message if session has 'status' key -->
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Display a table for the calendar data -->
                    <table class="table table-bordered">
                        <thead>
                            <th width="125">Time</th>
                            <!-- Loop through week days and display them as table headers -->
                            @foreach($weekDays as $day)
                                <th>{{ $day }}</th>
                            @endforeach
                        </thead>
                        <tbody>
                            <!-- Loop through calendar data and display each time and days -->
                            @foreach($calendarData as $time => $days)
                                <tr>
                                    <!-- Display the time -->
                                    <td>
                                        {{ $time }}
                                    </td>
                                    <!-- Loop through each day -->
                                    @foreach($days as $value)
                                        @if (is_array($value))
                                            <!-- If the value is an array, display the class name and teacher name -->
                                            <td rowspan="{{ $value['rowspan'] }}" class="align-middle text-center" style="background-color:#f0f0f0">
                                                {{ $value['class_name'] }}<br>
                                                Teacher: {{ $value['teacher_name'] }}
                                            </td>
                                        @elseif ($value === 1)
                                            <!-- If the value is 1, display an empty td -->
                                            <td></td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
