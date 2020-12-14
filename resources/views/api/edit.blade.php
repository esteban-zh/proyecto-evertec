<form method="POST" v-on:submit.prevent="updateProduct(fillProduct.id)">
    <div class="modal fade" id="edit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit product </h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <label for="product">edit product</label>
                <input type="text" name="product" class="form-control" v-model="fillProduct.name">
                <span v-for="error in errors" class="text-danger">@{{ error }}</span> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input name="name" type="text" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">price</label>
                        <input name="price" type="number" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">picture</label>
                        <input name="picture" type="file" class="form-control" id="exampleInputPassword1">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-block btn-primary" value="Update">
                </div>
            </div>
        </div>
    </div>
</form>