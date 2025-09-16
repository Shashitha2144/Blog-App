# Blog App

### Chnages

- add database relations
- Add header UI
- add blog Grid
- Add Blog catagory bar
- Add Blog view Page
- Implement comment fetch and adding for relevent post 
- add role base authentication and role base redirections base on loged email


### rough skatch for use case Diagram

usecaseDiagram
    actor User
    actor Admin

    User --> (View blog posts)
    User --> (Comment on blog posts)
    User --> (Edit their own comments)

    Admin --> (Manage users )
    Admin --> (Manage blog posts )
    Admin --> (Manage comments )
    Admin --> (View dashboard with analytics and statistics)

    Author --> (Create new blog posts)
    Author --> (Edit their own blog posts)
    Author --> (Publish their own blog posts )
    Author --> (View their own blog post analytics)

### Database Diagram (screenshot of DBMS tool database diagram)

![alt text](image.png)


### screenshots

![Post Cards]({738E5670-43AA-4B6C-B1D0-AFC9D19BEC48}.png)
![Read Post]({01EB6254-CBF5-4F7B-9ECD-B25CBCD3860C}.png)
![comments relevent post]({96A8C45C-82D3-4C5B-A2EC-8D7736BFDB0C}.png)
![Admin DashBoard]({45EE0585-DEB4-4F3C-BCC1-240369E2B081}.png)
![Auther Dashboard]({6B17F736-9BA8-4BF4-83B2-C1EC5AD977EE}.png)