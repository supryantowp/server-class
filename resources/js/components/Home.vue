<template>
  <!-- type pausing -->
  <vue-typed-js :strings="['awesome', 'brilliant']">
    <h2>
      We are a
      <span class="typing"></span> Class!
    </h2>
  </vue-typed-js>
</template>

<script>
import { VueTypedJs } from "vue-typed-js";
Vue.use(VueTypedJs);
export default {};
</script>