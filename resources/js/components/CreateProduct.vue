<template>
    <div class="container">
        <form v-on:submit.prevent="createProduct">
            <div class="modal fade" id="create-product">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>new product</h4>
                            <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" v-model="fillProduct.name" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="price">price</label>
                                    <input type="number" v-model="fillProduct.price" class="form-control" id="price">
                                </div>
                                <div class="form-group">
                                    <label for="picture">picture</label>
                                    <input type="text" v-model="fillProduct.picture" class="form-control" id="picture">
                                </div>
                                <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="text" v-model="fillProduct.description" class="form-control" id="description">
                                </div>
                                <div class="form-group">
                                    <label for="stock">stock</label>
                                    <input type="number" v-model="fillProduct.stock" class="form-control" id="stock">
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <input type="text" v-model="fillProduct.status" class="form-control" id="status">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="create">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</template>

<script>
let user = document.head.querySelector('meta[name="user-auth"]');
import axios from "axios";
export default {
    data() {
        return {
            fillProduct: { 
                'name':'', 
                'price':'', 
                'picture':'',
                'description':'',
                'stock':'',
                'status':'',
                'api_token': JSON.parse(user.content).api_token
                },
            errors: []
        };
    },
    methods: {
        createProduct: function() {
            var url = "/api/products";
            
            axios
                .post(url, this.fillProduct)
                .then(response => {
                    $('#create-product').modal('hide');
                    this.$emit('createProduct');
                    alert("new product successfully create");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        }
    }
};
</script>