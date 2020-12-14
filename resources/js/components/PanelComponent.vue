<template>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>stock</th>
                    <th>status</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(product, index) in products" :key="index">
                    <td>{{ product.id }}</td>
                    <td>{{ product.name }}</td>
                    <td>bring images</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.stock }}</td>
                    <td>{{ product.status }}</td>
                    <td>
                        <a
                            href="#"
                            class="btn btn-outline-primary"
                            v-on:click.prevent="editProduct(product)"
                            type="submit"
                            id="button-addon2"
                            data-toggle="modal"
                            data-target="#edit"
                            >edit</a
                        >
                    </td>
                    <td>
                        <a
                            href="#"
                            class="btn btn-outline-primary"
                            type="submit"
                            id="button-addon2"
                            v-on:click.prevent="deleteProduct(product)"
                            >delete</a
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
let user = document.head.querySelector('meta[name="user-auth"]');
import axios from "axios";
export default {
    data() {
        return {
            products: [],
            newProduct: '',
            fillProduct: { 
                'id': '', 
                'name':'', 
                'price':'', 
                'picture':'',
                },
            errors: []
        };
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        getProducts: function() {
            axios
                .get(
                    "/api/products" +
                        "?api_token=" +
                        JSON.parse(user.content).api_token
                )
                .then(response => {
                    this.products = response.data;
                });
        },
        editProduct: function(product) {
            this.fillProduct.id = product.id;
            this.fillProduct.name = product.name;
            this.fillProduct.price = product.price;
            $("#edit").modal("show");
        },
        updateProduct: function(id){
            alert('edit');
        },
        deleteProduct: function(product) {
            axios
                .delete(
                    "/api/products/" +
                        product.id +
                        "/?api_token=" +
                        JSON.parse(user.content).api_token
                )
                .then(response => {
                    this.getProducts();
                    alert("The product has been removed successfully");
                });
        },
        createProduct: function() {
            var url = "/api/products";
            // axios
            //     .post(
            //         "/api/products" +
            //             "?api_token=" +
            //             JSON.parse(user.content).api_token
            //     )
            axios
                .post(url, {
                    product: this.newProduct
                })
                .then(response => {
                    this.getProducts();
                    this.newProduct = "";
                    this.errors = [];
                    $("create").modal("hide");
                    alert("new product successfully create");
                })
                .catch(error => {
                    this.errors = error.response.data;
                });
        }
    }
};
</script>
