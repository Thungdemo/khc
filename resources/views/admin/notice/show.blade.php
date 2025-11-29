    <div class="p-4">
        <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <div>{{ $notice->title }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Category</label>
            <div>{{ $notice->noticeCategory->name }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Subcategory</label>
            <div>{{ $notice->noticeSubcategory->name ?? '-' }}</div>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Type</label>
            <div>{{ ucfirst($notice->noticeType()) }}</div>
        </div>

        @if($notice->noticeType() === 'file')
            <div class="mb-3">
                <label class="form-label fw-bold">Document</label>
                @if($notice->documentExists())
                    <div><a href="{{ $notice->documentUrl() }}" target="_blank">View document</a></div>
                @else
                    <div class="text-muted">No document uploaded.</div>
                @endif
            </div>
        @elseif($notice->noticeType() === 'url')
            <div class="mb-3">
                <label class="form-label fw-bold">URL</label>
                <div><a href="{{ $notice->url }}" target="_blank">{{ $notice->url }}</a></div>
            </div>
        @endif

        @if($notice->noticeChildren->count())
            <div class="mb-3">
                <label class="form-label fw-bold">Additional Documents</label>
                <table class="table table-bordered table-sm mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Document</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notice->noticeChildren as $child)
                            <tr>
                                <td>{{ $child->title }}</td>
                                <td>
                                    @if($child->documentExists())
                                        <a href="{{ $child->documentUrl() }}" target="_blank" class="">View</a>
                                    @else
                                        <span class="text-danger">Document not found</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif    <div class="mb-3">
            <label class="form-label fw-bold">Publish Date</label>
            <div>{{ \App\Helpers\DateHelper::display($notice->published_at) }}</div>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.notice.edit', $notice->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('admin.notice.index') }}" class="btn btn-secondary ms-2">Back</a>
        </div>
    </div>