## How to use git between 2 computers ##
When working on this TAFE project you may need to be on more than one computer at a time during development. Here are some pointers and daily practices.

## Get started ##
Ok, new computer with Vagrant up and running. Instead of creating a new Laravel project just clone this one from inside the vagrant folder (where all projects live - same place as your yaml file.)

    git clone https://github.com/2blackbelts/instablog.git

Once installed, cd into the new project and run:

    composer install
This will install all project dependencies. Adjust the Yaml and sites file to visit the site in the browser.

## Database ##
Make sure you're inside your machine:

    vagrant ssh

Then you can access the MySql Monitor:

    mysql -u homestead -p
When prompted: password is *secret*

## Version Control Commit and Checkout ##
When completing your work, ensure that you commit your changes (save on Github).

From your other computer, you will need to *Checkout...* and select the branch you would like to retrieve from Github.

When the files are downloaded you will be in *detached head* mode, meaning there is no connection to a branch. You can work in this mode and then commit the changes, but is basically an unstable local project with no history.

One option - so far this works - is to create a new branch and "Match tracking branch name" with the tracking branch selected (the non-local repo). This create a new branch with the same name making it easy to commit directly back into the online repository while developing.

**Take care** and make sure you always *commit* your changes. When you checkout and overwrite your local files, they are gone!

**In short** - Commit when the work should be shared with other computers.
