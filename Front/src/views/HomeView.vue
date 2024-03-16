<template>
  <main class="f-col a-cent p-64-0">
    <img src="../assets/images/logo-big.svg" class="mb-16" />
    <img src="../assets/images/logo-small.svg" class="mb-64" />
    <h1 class="mb-16">Code Together in H1</h1>
    <h2 class="mb-16">Code Together in H2</h2>
    <h3 class="mb-16">Code Together in H3</h3>

    <div class="f p-64-0">
      <button>Primary Button</button>
      <button class="btn-secondary ml-32">Secondary Button</button>
    </div>

    <div class="f-col a-cent bg-light-shadow p-64-128 br-50">
      <input type="text" placeholder="Placeholder" class="mb-32" />

      <textarea placeholder="Placeholder" class="mb-32"></textarea>

      <select name="example" class="mb-32">
        <option option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
      </select>

      <div class="f">
        <p class="chip-d">Default</p>
        <p class="chip-i ml-16">Important</p>
        <p class="chip-vi ml-16">Very Important</p>
      </div>
    </div>
  </main>
</template>
