
{{-- @extends('layouts.app')

@section('content')
    <section>
        <div class="row">
            <div class="col-xl">
                <div class="layout-container">
                    <div class="content-wrapper">
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4">View Comments</h4>
                            <div class="row">
                                <div class="col-xl">
                                    @forelse($complaint->comments as $comment)
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <div class="d-flex flex-start mb-4">
                                                   
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <h5 class="mb-0" style="font-weight: 600; color: #333;">
                                                                    @if ($comment->checkstatus)
                                                                    {{ $comment->checkstatus->number ?? 'No number available' }}
                                                                @else
                                                                    {{ 'No check status available' }}
                                                                @endif
                                                                

                                                                </h5>
                                                                <form
                                                                    action="{{ route('admin.complaints.deleteComments', $comment->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger btn-sm"
                                                                        onclick="return confirm('Are you sure you want to delete this comment?')">
                                                                        <i class="fas fa-trash-alt"></i> Delete
                                                                    </button>
                                                                </form>

                                                            </div>
                                                            <!--<span-->
                                                            <!--    class="text-muted small">{{ $comment->created_at->format('Y-m-d H:i:s') }}</span>-->
                                                            <span class="text-muted small">
                                                                {{ $comment->created_at->setTimezone('Asia/Kolkata')->format('F j, Y \a\t g:i A') }}
                                                            </span>

                                                            <p class="mt-2" style="font-size: 1rem; color: #444;">
                                                                {{ $comment->body }}</p>
                                                        </div>

                                                        <!-- Nested Comments -->
                                                        @include('admin.complaints._nested_comments', [
                                                            'comments' => $comment->replies,
                                                        ])
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center" style="color: red">No comments available.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}
@extends('layouts.app')

@section('content')
<section>
    <div class="row">
        <div class="col-xl">
            <div class="layout-container">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4">View Comments</h4>

                        <!-- Reply Form (Only Appears Once at the Top) -->
                        
                        <form action="{{ route('admin.complaints.reply.store') }}" method="POST" class="mb-4">
                            @csrf
                            <input type="hidden" name="admin_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
                            <textarea name="body" class="form-control" rows="3" placeholder="Write your comment..." required></textarea>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
                        </form>

                        <div class="row">
                            <div class="col-xl">
                                {{-- {{dd($complaint->comments)}} --}}
                                @forelse($complaint->comments as $comment)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="d-flex flex-start mb-4">
                                                <div class="flex-grow-1 flex-shrink-1">
                                                    <div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <h5 class="mb-0" style="font-weight: 600; color: #333;">
                                                                {{\App\Helpers\CommonHelper::getAdminName($comment->check_status_id) }}
                                                            </h5>
                                                            <!-- Delete Button -->
                                                            <form action="{{ route('admin.complaints.deleteComments', $comment->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                    onclick="return confirm('Are you sure you want to delete this comment?')">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                        
                                                        <span class="text-muted small">
                                                            {{ $comment->created_at->setTimezone('Asia/Kolkata')->format('F j, Y \a\t g:i A') }}
                                                        </span>
                                                        <p class="mt-2" style="font-size: 1rem; color: #444;">
                                                            {{ $comment->body }}
                                                        </p>
                                                    </div>
                                                    
                                                    <!-- Nested Comments -->
                                                    @include('admin.complaints._nested_comments', [
                                                        'comments' => $comment->replies,
                                                    ])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <!-- If no comments exist -->
                                    <p class="text-center" style="color: red">No comments available. Add the first comment above:</p>
                                @endforelse
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


