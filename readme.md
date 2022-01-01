# Design Pattern

This is a behavioral design pattern. For event based actions there are many design patterns, mediator pattern is one of them. Before moving to mediator pattern, let's learn a bit about the other event patterns.

For the example we will be using an example of baby and observers as mom, dad and maid.

## Observer Pattern

This pattern is based on subject and observables. Let's consider baby is crying and then it will push event to all the obserbables irrespective of interest and based on state one observer will take action.

Now let's move the the mediator pattern

## Mediator Pattern

### Best Practice
- After mutator method like attach / detach it is good to return the same class object for method chaining.