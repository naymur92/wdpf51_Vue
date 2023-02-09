<template>
  <div>
    <input
      type="text"
      v-model="nameField"
      @keyup.enter="changeName(nameField)"
      placeholder="Enter fullname"
    />
    <button :disabled="nameField.length < 1" @click="changeName(nameField)">
      Submit
    </button>

    <p>
      Firstname: <span>{{ firstName }}</span>
    </p>
    <p>
      LastName: <span>{{ lastName }}</span>
    </p>
    <p>
      Full Name: <span>{{ fullName }}</span>
    </p>
  </div>
</template>
<script>
export default {
  data() {
    return {
      firstName: "John",
      lastName: "Doe",
      nameField: "",
    };
  },
  computed: {
    fullName: {
      // getter
      get() {
        return this.firstName + " " + this.lastName;
      },
      // setter
      set(newValue) {
        // Note: we are using destructuring assignment syntax here.
        [this.firstName, this.lastName] = newValue.split(" ");
      },
    },
  },
  methods: {
    changeName(name) {
      this.fullName = name;
    },
  },
};
</script>