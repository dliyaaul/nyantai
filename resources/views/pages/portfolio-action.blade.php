<div class="modal-content">
    <form id="formAction" action="{{ $portfolio->id ? route('portfolio.update', $portfolio->id) : route('portfolio.store') }}" method="post">
        @csrf
        @if($portfolio -> id)
        @method('put')
        @endif
        <div class="modal-header">
            <h5 class="modal-title" id="largeModalLabel">
                @if($portfolio->id == '')
                Create Portfolio
                @else
                Edit Portfolio
                @endif
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="portfolioTitle" class="form-label">Title</label>
                        <input type="text" placeholder="Portfolio title" class="form-control" id="portfolioTitle" name="title" value="{{ $portfolio->title }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" placeholder="Portfolio date" class="form-control" id="date" name="date" value="{{ $portfolio->date }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" placeholder="Portfolio image" class="form-control" id="image" name="image" value="{{ $portfolio->image }}">
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        @if ($portfolio->image)
                        <img id="preview" src="{{ $portfolio->image }}" alt="your image" style="width: 80px;height:80px;" />
                        @else
                        <img id="preview" src="{{ asset('')}}assets/images/avatar1.png" alt="your image" style="width: 80px;height:80px;" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
    reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
    }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function() {
    readURL(this);
});
</script>