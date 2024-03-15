<template>
  <h1>Home</h1>
  <v-chip color="primary"> ça marche </v-chip>

  <v-select
    label="Select"
    :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
  ></v-select>
  <v-text-field label="Email address" placeholder="johndoe@gmail.com" type="email"></v-text-field>
</template>
