<?php

        class Animal implements IAnimal {
        }

        Interface IAnimal {
            function voice();
        }

        class Dog extends Animal {
            function voice (){
                echo 'wuf wuf';
            }      
        }

        class Cat extends Animal {
            function voice (){
                echo 'miau miau';
            }      
        }

        

?>