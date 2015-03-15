{{ Form::open(['files'=>true, 'route'=>'product.save']) }}

<div class="form-item form-item-text be-placeholder">
    <label for="occupation">Title</label>
    <input name="title" type="text" class="form-text form-text-normal" id="occupation" placeholder="Enter Product Title" required="">
</div>

<div class="form-item form-item-select">
    <label for="occupation">Category</label>
    {{ Form::select('category_id', ProductCategory::lists('name', 'id'), null, ['class' => 'form-select form-select-normal',]) }}
</div>

<div class="form-item form-item-text be-placeholder">
    <label>Price</label>
    <input name="price" type="number" class="form-text form-text-normal" placeholder="Enter Price" required="">
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-item form-item-text be-placeholder">
            <label>Bust (inch)</label>
            <input name="vs_bust" type="number" maxlength="2" class="form-text form-text-normal" placeholder="" required="">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-item form-item-text be-placeholder">
            <label>Waist (inch)</label>
            <input name="vs_waist" type="number" maxlength="2" class="form-text form-text-normal" placeholder="" required="">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-item form-item-text be-placeholder">
            <label>Hips (inch)</label>
            <input name="vs_hips" type="number" maxlength="2" class="form-text form-text-normal" placeholder="" required="">
        </div>
    </div>

</div>

<div class="form-item form-item-select">
    <label for="occupation">Description</label>
    {{ Form::textarea('content', null, ['class'=>'form-text form-text-normal', 'style' => 'height: 100px; padding: 5px;',])  }}
</div>

<div class="form-group">
    <div class="form-item form-item-text be-placeholder">
        <label>Available Sizes</label>
        {{ Form::select('sizes', ['XS' => 'Xtra Small', 'S' => 'Small', 'M' => 'Medium', 'L' => 'Large', 'XL' => 'Xtra Large'], null, ['class' => 'form-select form-control form-select-normal','multiple', 'style' => 'padding:2px',]) }}
    </div>
</div>

<div class="form-group">
    <div class="form-item form-item-text be-placeholder">
        <label>Product Image</label>
        {{ Form::file('image', ['class'=>'form-control']) }}
    </div>
</div>

<div class="form-group">
    <div class="form-item form-item-text be-placeholder">
       <button class="btn btn-block btn-primary btn-lg">Publish</button>
    </div>
</div>

{{ Form::close() }}