<template>
    <component :is="componentOptions"></component>
</template>

<script>
import upperFirst from 'lodash/upperFirst'
import camelCase from 'lodash/camelCase'

export default {
    props: {
        name: String,
        isOutline: Boolean,
    },

    computed: {
        componentName() {
            return upperFirst(camelCase(this.name))
        },

        componentOptions () {
            if (this.isOutline) {
                return 'HeroIconOutline' + this.componentName
            }

            return 'HeroIconSolid' + this.componentName
        }
    }
}
</script>
