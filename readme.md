# Headless Wordpress
An example of using wordpress as a headless CMS for publishing static JSON for apps and websites to consume.

## Requirements 
In order to run these code examples you will need the following:
- Docker
	- [OSX](https://docs.docker.com/docker-for-mac/install/)
	- [Windows](https://docs.docker.com/docker-for-windows/install/)
	- [Ubuntu](https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/)

## Running
- `cd wordpress`
- `docker-compose up`
- `localhost:8080/wp-admin`
	- user: `root`
	- pass: `root`
- Party

## WTF is going on?
Now that you've got the project running let's look at what is going on here.

Wordpress is an awesome platform, and for a while there ( and still today ) it's pretty widely used, the problem with wordpress and modern frontend development is that it can get bloated, slow, there are security issues, it can be a pain to configure, what ever reason you can imagine someone has an issue with it.

That said it's actually a pretty powerful platform when used right, in this example I am going to go over a bare bones approach to building a headless wordpress site that publishes to s3 as static JSON which can be consumed by your website, app, whatever you want.

Let's take a look at what this takes and how easy it can be to get something up and running and where we can take it.

### The Guts
Let's check out the structure of our wordpress installation.

The first thing is that this is using Docker as a base the example wordpress install from my [Dockerize All The Things](https://github.com/DrewDahlman/dockerize-all-the-things) This guide assumes you have knowledge of docker but it's not 100% required for doing something like this.

#### Wordpress
The install of Wordpress that we have is stripped down to only the essentials wich is just the admin and some base utils in a theme called `headless`. I've also removed all outbound scripts so there are no comments, no trackbacks, no signup, none of that - just the admin and a base theme.

In the plugins we have 4 plugins.
- ACF Pro ( [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) )
	- If you haven't used this, start. It will change wordpress dev forever.
- CPT ( [Custom Post Types](https://wordpress.org/plugins/custom-post-type-ui/) )
	- Another powerful tool in created custom post types and taxonomies.
- AWS ( [Amazon Web Services](https://wordpress.org/plugins/amazon-web-services/) )
- WP Offload ( [Wordpress Offload Lite](https://wordpress.org/plugins/amazon-s3-and-cloudfront/) )
- WP Headless ( [WP Headless](https://github.com/DrewDahlman/wp-headless) )
	- Plugin for this project, we will cover this later.

These plugins are the foundation to what we will be building. With these we will customize our wordpress install with some custom post types, fields and upload to s3 for consuming in your app / project.

Note that for this example I have created a plugin with these as dependencies but that you could roll your own version of something like this and we will cover that.

Check out the [Medium Post To Learn More](https://medium.com/@meuspartum/off-with-their-heads-building-a-headless-wordpress-to-manage-content-bb04e6b2a792)



