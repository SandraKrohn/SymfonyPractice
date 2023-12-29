START SERVER: symfony server:start
STOP SERVER: symfony server:stop (NOT ctrl + c)

Folder "public" / index.php: all HTTP endpoints will be here
Folder "src": will contain all code we'll write
Folder "vendor": contains everything installed with Composer - don't touch this

Controller: middle layer between view and model (database),
            starting point where a request to a route is made
Model: repository-file that interacts with the database
View: what we see, duh

Fixtures: usually for testing (adding dummy data)
Updating DB stuff: via fixtures -> symfony console doctrine:fixtures:load

ADDING CHANGES TO GIT:
git add .
git commit -m "message here"
git push