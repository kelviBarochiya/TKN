@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Forms /</span> Holiday Form
            </h4>

            <div class="card">
                <h5 class="card-header">{{ isset($holiday) ? 'Edit Holiday' : 'Create Holiday' }}</h5>
                <div class="card-body">
                    <form action="{{ isset($holiday) ? route('holidays.update', $holiday->id) : route('holidays.store') }}"
                        method="POST">
                        @csrf
                        @isset($holiday)
                            @method('PUT') <!-- Use PUT method for update -->
                        @endisset

                        <!-- Holiday Type Selection -->
                        <div class="mb-3">
                            <label class="form-label">Holiday Type<span style="color:red;">*</span></label><br>
                            <input type="radio" id="single" name="holiday_type" value="single"
                                @checked(old('holiday_type', $holiday->holiday_type ?? 'single') == 'single')> Single Date
                            <input type="radio" id="range" name="holiday_type" value="range"
                                @checked(old('holiday_type', $holiday->holiday_type ?? 'single') == 'range')> Date Range
                            <span class="text-danger">
                                @error('holiday_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Single Date Input -->
                        <div class="mb-3" id="singleDateFields" style="display: none;">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" name="date" id="date"
                                value="{{ old('date', $holiday->date ?? '') }}">
                        </div>

                        <!-- Date Range Input -->
                        <div class="mb-3" id="dateRangeFields" style="display: none;">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"
                                value="{{ old('start_date', $holiday->start_date ?? '') }}">

                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="end_date"
                                value="{{ old('end_date', $holiday->end_date ?? '') }}">
                        </div>

                        <!-- Day Input -->
                        <div class="mb-3">
                            <label for="day" class="form-label">Day</label>
                            <input type="text" class="form-control" name="day" id="day"
                                value="{{ old('day', $holiday->day ?? '') }}" required readonly>
                        </div>

                        <!-- Event Name Input -->
                        <div class="mb-3">
                            <label for="event_name" class="form-label">Event Name<span style="color:red;">*</span></label>
                            <input type="text" class="form-control" name="event_name" id="event_name"
                                value="{{ old('event_name', $holiday->event_name ?? '') }}">
                            <span class="text-danger">
                                @error('event_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <button type="submit"
                            class="btn btn-primary">{{ isset($holiday) ? 'Update Holiday' : 'Create Holiday' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleDateFields() {
                const holidayType = document.querySelector('input[name="holiday_type"]:checked').value;

                if (holidayType === 'range') {
                    document.getElementById('singleDateFields').style.display = 'none';
                    document.getElementById('dateRangeFields').style.display = 'block';
                } else {
                    document.getElementById('singleDateFields').style.display = 'block';
                    document.getElementById('dateRangeFields').style.display = 'none';
                }
            }

            toggleDateFields();

            document.getElementById('single').addEventListener('change', toggleDateFields);
            document.getElementById('range').addEventListener('change', toggleDateFields);

            // Auto-fill day for single date
            document.getElementById('date').addEventListener('change', function() {
                const date = new Date(this.value);
                const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
                    "Saturday"
                ];
                document.getElementById('day').value = daysOfWeek[date.getDay()];
            });

            // Auto-fill days for range
            document.getElementById('start_date').addEventListener('change', updateDaysInRange);
            document.getElementById('end_date').addEventListener('change', updateDaysInRange);

            function updateDaysInRange() {
                const startDate = document.getElementById('start_date').value;
                const endDate = document.getElementById('end_date').value;

                if (startDate && endDate) {
                    const start = new Date(startDate);
                    const end = new Date(endDate);
                    const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                    const daysInRange = [];

                    while (start <= end) {
                        daysInRange.push(dayNames[start.getDay()]);
                        start.setDate(start.getDate() + 1);
                    }
                    document.getElementById('day').value = daysInRange.join(', ');
                }
            }
        });
    </script>
@endsection
