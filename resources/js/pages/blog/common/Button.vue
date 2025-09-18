<script setup lang="ts">
import { computed } from 'vue';

const props = withDefaults(defineProps<{
  variant?: 'primary' | 'secondary' | 'danger';
  size?: 'sm' | 'md' | 'lg';
  type?: 'button' | 'submit' | 'reset';
  disabled?: boolean;
  ariaLabel?: string;
}>(), { variant: 'primary', size: 'md', type: 'button', disabled: false });


const emit = defineEmits<{
  (e: 'click', ev?: MouseEvent): void;
}>();

const classes = computed(() => {
  const base = 'inline-flex items-center justify-center rounded-md font-medium transition';
  const sizeMap = { sm: 'px-2 py-1 text-sm', md: 'px-3 py-2 text-sm', lg: 'px-4 py-2 text-base' };
  const variantMap: Record<string,string> = {
    primary: 'bg-indigo-600 text-white hover:bg-indigo-700',
    secondary: 'bg-gray-100 text-gray-800 hover:bg-gray-200',
    danger: 'bg-red-600 text-white hover:bg-red-700'
  };
  return [base, sizeMap[props.size!], variantMap[props.variant!]].join(' ');
});
</script>

<template> 
  <button
    :type="props.type"
    :class="classes"
    :disabled="props.disabled"
    :aria-label="props.ariaLabel"
    @click="emit('click', $event)"
  >
    <slot />
  </button>
</template>
 