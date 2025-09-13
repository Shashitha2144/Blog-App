# Blog App

### rough skatch for use case Diagram

usecaseDiagram
    actor User
    actor Admin

    User --> (Login)
    User --> (View Dashboard)
    User --> (Update Profile)
    User --> (Logout)

    Admin --> (Login)
    Admin --> (Manage Users)
    Admin --> (View Reports)
    Admin --> (Logout)

    (Login) --> (View Dashboard)
    (Logout) --> (Login)

### Database Diagram

![alt text](image.png)