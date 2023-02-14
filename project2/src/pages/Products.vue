<template>
  <div class="container mt-5">
    <div class="">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Products Page</h1>
        <button @click="addProdBtn()" class="btn btn-success">
          Add Product
        </button>
        <a href="/products/find" class="btn btn-outline-primary"
          >Find Product</a
        >
      </div>

      <!-- Form Area -->
      <div v-if="show_form" class="card">
        <div class="card-header bg-primary">
          <h4 class="text-light text-center">
            Product {{ edit_page ? "Edit" : "Entry" }} Form
          </h4>
        </div>
        <form @submit.prevent="submitForm()">
          <div class="card-body">
            <div class="form-group">
              <label for="_name"><strong>Product Name</strong></label>
              <input
                type="text"
                id="_name"
                v-model="product_info.name"
                placeholder="Enter Product Name"
                class="form-control"
              />

              <ul v-if="errors.product_name" class="text-danger my-2">
                <li v-for="(err, index) in errors.product_name" :key="index">
                  {{ err }}
                </li>
              </ul>
            </div>
            <div class="form-group">
              <label for="_details"><strong>Product Details</strong></label>
              <textarea
                id="_details"
                v-model="product_info.details"
                class="form-control"
                rows="5"
                placeholder="Enter Product Details"
              ></textarea>

              <ul v-if="errors.product_details" class="text-danger my-2">
                <li v-for="(err, index) in errors.product_details" :key="index">
                  {{ err }}
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="_price"><strong>Product Price</strong></label>
                  <input
                    type="number"
                    id="_price"
                    v-model="product_info.price"
                    placeholder="Enter Product Price"
                    class="form-control"
                  />

                  <ul v-if="errors.product_price" class="text-danger my-2">
                    <li
                      v-for="(err, index) in errors.product_price"
                      :key="index"
                    >
                      {{ err }}
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="_stock"><strong>Product Stock</strong></label>
                  <input
                    type="number"
                    id="_stock"
                    v-model="product_info.stock"
                    placeholder="Enter Product Stock"
                    class="form-control"
                  />

                  <ul v-if="errors.product_stock" class="text-danger my-2">
                    <li
                      v-for="(err, index) in errors.product_stock"
                      :key="index"
                    >
                      {{ err }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="_category"><strong>Product Categry</strong></label>
              <select
                v-model="product_info.category"
                id="_category"
                class="form-control"
              >
                <option selected disabled>Select One</option>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
              </select>

              <ul v-if="errors.product_category" class="text-danger my-2">
                <li
                  v-for="(err, index) in errors.product_category"
                  :key="index"
                >
                  {{ err }}
                </li>
              </ul>
            </div>
            <div class="form-group">
              <label for="_thumb"><strong>Product Thumbnail</strong></label>
              <input type="file" class="form-control" />
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <button @click="cancelForm()" class="btn btn-warning">
              Cancel
            </button>
            <input
              type="reset"
              @click="product_info = {}"
              class="btn btn-danger"
              value="Reset"
            />
            <input
              type="submit"
              :value="edit_page ? 'Update' : 'Add Product'"
              class="btn btn-success"
            />
          </div>
        </form>
      </div>

      <!-- Product list -->
      <div v-if="!show_form" class="row">
        <div class="col-4 my-2" v-for="item in products" :key="item.id">
          <div class="card">
            <div class="card-header bg-secondary">
              <h5 class="text-light">{{ item.product_name }}</h5>
            </div>
            <div class="card-body">
              <p>{{ item.product_details }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <button class="btn btn-success" @click="editProduct(item)">
                Edit
              </button>
              <button class="btn btn-danger" @click="deleteProduct(item.id)">
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      products: [],
      edit_page: false,
      show_form: false,
      errors: {},
      product_info: {
        id: null,
        name: "",
        details: "",
        price: null,
        stock: null,
        category: null,
      },
    };
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      axios.get("http://127.0.0.1:8000/api/products").then((res) => {
        this.products = res.data;
      });
    },
    addProdBtn() {
      this.show_form = true;
      this.product_info = {};
      this.edit_page = false;
    },
    addProduct() {
      axios
        .post("http://127.0.0.1:8000/api/products/", {
          product_name: this.product_info.name,
          product_details: this.product_info.details,
          product_price: this.product_info.price,
          product_stock: this.product_info.stock,
          product_category: this.product_info.category,
        })
        .then((res) => {
          // console.log(res.data);
          if (res.data.success) {
            this.errors = {};
            this.product_info = {};
            this.show_form = false;
            this.getProducts();
            window.scrollTo(0, 0);
            alert(res.data.msg);
          }
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    updateProduct() {
      axios
        .put("http://127.0.0.1:8000/api/products/" + this.product_info.id, {
          product_name: this.product_info.name,
          product_details: this.product_info.details,
          product_price: this.product_info.price,
          product_stock: this.product_info.stock,
          product_category: this.product_info.category,
        })
        .then((res) => {
          this.errors = {};
          this.product_info = {};
          this.show_form = false;
          this.getProducts();
          window.scrollTo(0, 0);
          alert(res.data.msg);
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
    submitForm() {
      this.errors = {};
      if (this.product_info.id) {
        this.updateProduct();
      } else {
        this.addProduct();
      }
    },
    deleteProduct(id) {
      axios.delete("http://127.0.0.1:8000/api/products/" + id).then((res) => {
        if (res.data.success) {
          this.getProducts();
          // window.scrollTo(0, 0);
          alert(res.data.msg);
        }
      });
    },
    editProduct(product) {
      this.product_info.id = product.id;
      this.product_info.name = product.product_name;
      this.product_info.details = product.product_details;
      this.product_info.price = product.product_price;
      this.product_info.stock = product.product_stock;
      this.product_info.category = product.product_category;

      this.edit_page = true;
      this.show_form = true;

      window.scrollTo(0, 0);
    },
    cancelForm() {
      this.edit_page = false;
      this.show_form = false;
      this.product_info = {};

      window.scrollTo(0, 0);
    },
  },
};
</script>

<style>
</style>