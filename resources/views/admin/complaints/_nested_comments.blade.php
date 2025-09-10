@foreach ($comments as $comment)
    <div class="comment-box mt-4"
        style="background-color: #fff; border-radius: 10px; padding: 15px 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <div class="d-flex">
            {{-- @if (isset($comment->user) && isset($comment->user->image))
                <img src="{{ asset('public/images/' . $comment->user->image) }}" alt="{{ $comment->user->name }}"
                    class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
            @else
                <img src="{{ asset('public/images/people.png') }}" alt="Default User" class="rounded-circle"
                    style="width: 30px; height: 30px; object-fit: cover;">
            @endif --}}
            {{-- <img src="{{ $comment->user->image ? asset('public/images/' . $comment->user->image) : asset('public/images/people.png') }}"
                    alt="{{ $comment->user->name }}" class="rounded-circle"
                    style="width: 30px; height: 30px; object-fit: cover;"> --}}
            <div class="ml-3 w-100">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="font-weight: 600; color: #333;">
                        {{ getUserName($comment->check_status_id) }}
                    </h5>
                    <form action="{{ route('admin.complaints.deleteComments', $comment->id) }}" method="POST"
                        style="display: inline;">
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
                <p class="mt-2" style="font-size: 1rem; color: #444;">{{ $comment->body }}</p>
            </div>
        </div>

        <!-- Recursive Call for Nested Comments -->
        @if ($comment->replies->isNotEmpty())
            <div class="replies mt-3" style="border-left: 2px solid #ddd; margin-left: 60px; padding-left: 20px;">
                @include('admin.complaints._nested_comments', ['comments' => $comment->replies])
            </div>
        @endif
    </div>
@endforeach
