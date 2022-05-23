<button type="button" class="btn ml-1 {{ $btnClass }}" data-bs-toggle="modal" data-bs-target="#modal{{ $id }}">@if (isset($icon))
  <i class="{{ $icon }}"></i>
@endif
    {{ $btnTitle }}
</button>
<div class="modal fade" id="modal{{ $id }}" tabindex="-1" aria-labelledby="modal{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog @if (isset($modalSize))modal-{{ $modalSize }}@endif modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal{{ $id }}Label">{{ $title }}</h5>
                <button type="button" class="btn  btn-secondary btn-close" data-bs-dismiss="modal"
                    aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                @if (isset($view))
                    @if (isset($clientCategories))
                        @include($view, ['categories' => $clientCategories])
                    @elseif (isset($modesOfPayment))
                        @include($view, ['modes' => $modesOfPayment])
                    @else
                        @include($view)
                    @endif
                @elseif (isset($import))
                    <form action="{{ $import }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control">
                            <button class="btn btn-primary" type="submit" onclick="return confirm('Confirm to import data')">Submit</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>


{{-- @include('cms.includes.popupModal', [
'title' => 'Add expenditure category',
'btnClass' => 'btn-success',
'btnTitle' => 'Add expenditure category',
'modalSize' => 'md', //this is optional, in default, it is md
//in case of import modal set import as:
'import' => 'import-value',
'id' => 'addexpenditurecategory',
'view' => 'expenditureCategories.create',
])

@include('cms.includes.popupModal', [
'title' => 'Edit expenditure category',
'btnClass' => 'btn-default fa fa-pencil font-14 btn-s m-r-5',
'btnTitle' => '',
'id' => $category->id,
'view' => 'expenditureCategories.edit',
]) --}}
