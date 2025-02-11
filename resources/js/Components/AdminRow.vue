<template>
  <tr>
    <td>{{ admin.id }}</td>
    <td>{{ admin.name }}</td>
    <td>{{ admin.email }}</td>
    <td>{{ admin.role }}</td>

    <td>
      <button class="btn btn-info btn-sm" @click="$emit('edit', admin)">Edit</button>
      <button class="btn btn-danger btn-sm" @click="deleteAdmin">Delete</button>
    </td>
  </tr>
</template>

<script>
export default {
  props: {
    admin: Object,
  },
  methods: {
    deleteAdmin() {
      this.$emit('delete', this.admin.id); // Emit the delete event with the admin's ID
    },
  },
};
</script>
