<template>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link class="nav-link" to="/">Home</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/about">About</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/contact">Contact</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/news">News</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link" to="/products">Products</router-link>
        </li>
        <li class="nav-item">
          <router-link class="nav-link position-relative" to="/cart">
            Cart
            <span
              v-if="$store.state.cart.length > 0"
              class="
                position-absolute
                top-5
                start-100
                translate-middle
                badge
                rounded-pill
                bg-warning
              "
            >
              {{ $store.state.cart.length }}
              <span class="visually-hidden">unread messages</span>
            </span>
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {};
</script>

<style>
</style>