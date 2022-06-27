<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Ajouter un nouvelle produit
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Tous les produits</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nom de produit</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Nom de produit" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                                    @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Code de produit</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Code de produit" class="form-control input-md" wire:model="slug">
                                    @error('slug') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Court Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="Court Description" cols="" placeholder="Short Description" wire:model="short_description"></textarea>
                                    @error('short_description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" cols="" placeholder="Description" wire:model="description"></textarea>
                                    @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Prix habituel</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Prix habituel" class="form-control input-md" wire:model="regular_price">
                                    @error('regular_price') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Prix de vente</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Prix de vente" class="form-control input-md" wire:model="sale_price">
                                    @error('sale_price') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{--<div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                    @error('SKU') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                <div class="col-md-4">
                                    <select  class="form-control" wire:model="stock_status">
                                        <option value="instock">En Stock</option>
                                        <option value="outstock">Hors de Stock</option>
                                    </select>
                                    @error('stock_status') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            {{--<div class="form-group">
                                <label class="col-md-4 control-label">Featured</label>
                                <div class="col-md-4">
                                    <select  class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantité</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Quantité" class="form-control input-md" wire:model="quantity">
                                    @error('quantity') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image du produit</label>
                                <div class="col-md-4">
                                    <input type="file"  class="input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}"  width="120" alt="">
                                    @endif
                                    @error('image') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Galerie de produits</label>
                                <div class="col-md-4">
                                    <input type="file"  class="input-file" wire:model="images" multiple>
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <img src="{{$image->temporaryUrl()}}"  width="120" alt="">
                                        @endforeach
                                    @endif
                                    @error('images') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
 
                            <div class="form-group">
                                <label class="col-md-4 control-label">Categories</label>
                                <div class="col-md-4">
                                    <select  class="form-control" wire:model="category_id">
                                        <option value="0">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('category_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit"  class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }

            });

            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description',sd_data);
                    });
                }

            });

        });
    </script>
@endpush
 