<template>
    <div>
        <div class="w-25 mb-4">
            <div>
                <h1 class="h5 mb-2 name">Имя</h1>
                <div class="d-flex">
                    <input type="text" class="form-control me-3" v-model="person" placeholder="имя">
                    <div class="d-flex align-items-center">
                        <input class="me-2" type="checkbox" v-model="is_mix" id="is_mix">
                        <label for="is_mix">Mix</label>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row mb-4">
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[0].is_include" id="planche">
                    <label class="h5 mb-2" for="planche">Горизонт</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[0].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[0].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[0].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[1].is_include" id="back_lever">
                    <label for="back_lever" class="h5 mb-2">Вис сзади</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[1].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[1].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[1].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[2].is_include" id="maltese">
                    <label for="maltese" class="h5 mb-2">Самолет</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[2].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[2].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[2].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
            </div>
            <div class="row mb-4">

                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[3].is_include" id="front_lever">
                    <label for="front_lever" class="h5 mb-2">Вис спереди</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[3].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[3].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[3].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[4].is_include" id="victorian">
                    <label for="victorian" class="h5 mb-2">Викториан</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[4].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[4].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[4].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[5].is_include" id="manna">
                    <label for="manna" class="h5 mb-2">Угол</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[5].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[5].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[5].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
            </div>
            <div class="row mb-4">

                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[6].is_include" id="handstand">
                    <label for="handstand" class="h5 mb-2">Стойка на руках</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[6].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[6].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[6].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[7].is_include" id="invert">
                    <label for="invert" class="h5 mb-2">Инверт</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[7].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[7].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[7].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
                <div class="mb-3 col-4">
                    <input type="checkbox" v-model="elements[8].is_include" id="handstand_corner">
                    <label for="handstand_corner" class="h5 mb-2">Стойка на руках угол</label>
                    <div class="mb-2">
                        <input class="form-control" type="number" v-model="elements[8].step"
                                             placeholder="Уровень">
                    </div>
                    <div class="mb-2"><input class="form-control" type="number" v-model="elements[8].sets"
                                             placeholder="Подходы"></div>
                    <div><input class="form-control" type="number" v-model="elements[8].exercises"
                                placeholder="Количество упражнений"></div>
                </div>
            </div>
        </div>

        <div>
            <input @click.prevent="getProgram" type="submit" value="get" class="btn btn-primary">
        </div>

        <div v-if="program">
            <div v-for="(day, key) in program" class="mb-3">
                День {{ key + 1 }}
                <div v-for="crystal in day">
                    Группа

                    <div v-for="exercise in crystal">
                        <template v-if="exercise">
                            <div><a :href="exercise.video_url">{{ exercise.name }}</a></div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",

    data() {
        return {
            program: null,
            person: null,
            is_mix: false,
            elements: [
                {
                    is_include: false,
                    elem_id: 1,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 1,
                },
                {
                    is_include: false,
                    elem_id: 2,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 1,
                },
                {
                    is_include: false,
                    elem_id: 3,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 1,
                },
                {
                    is_include: false,
                    elem_id: 4,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 2,
                },
                {
                    is_include: false,
                    elem_id: 5,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 2,
                },
                {
                    is_include: false,
                    elem_id: 6,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 2,
                },
                {
                    is_include: false,
                    elem_id: 7,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 3,
                },
                {
                    is_include: false,
                    elem_id: 8,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 3,
                },
                {
                    is_include: false,
                    elem_id: 9,
                    step: null,
                    sets: null,
                    exercises: null,
                    crystal: 3,
                }
            ]
        }
    },

    methods: {


        getProgram() {

            axios.post('/api/program', {
                person: this.person,
                elements: this.elements,
                is_mix: this.is_mix
            })
                .then(res => {
                    console.log(res);
                    this.program = res.data.program
                })
        }
    }
}
</script>

<style scoped>

</style>
