## How to use this Dockerized Bedrock WordPress repo

- Create .env file in root
- Copy paste the .env.example into .env and change variables as needed (the defaults should be enough to get you going in dev)
- `docker compose up --build`

The file to modify for configuration options is config/application.php. This is the file that contains what wp-config.php usually would. The root web/wp-config.php is required by WordPress and is only used to load the other main configs. Nothing else should be added to it.

## Allowing for multisite locally

We cannot have subdomain sites if using localhost as the domain. So (for Mac):

1. `sudo nano /etc/hosts`
2. Add the following mappings:

```
127.0.0.1 docker.local
127.0.0.1 site1.docker.local
127.0.0.1 site2.docker.local
```

Now, docker.local and the other subdomains will map to localhost (localhost:80).

### To start multisite on WordPress

1. On initial wp installation, `MULTISITE` in .env must be false.
2. After you've gone through the wp install steps, go to http://docker.local/wp/wp-admin/network.php
3. Select "Sub-domains" and click "Install". You should see a page with "Create a Network of WordPress Sites". Stay here.
4. Stop docker containers with `docker compose down`.
5. Change `MULTISITE` in .env to true.
6. Restart everything: `docker compose up`
7. Click "login" at bottom of the page
8. Login
9. If you see "My Sites" in top left, you are setup 🤝

Created by Dan Adams

The usual Bedrock README stuff...

<p align="center">
  <a href="https://roots.io/bedrock/">
    <img alt="Bedrock" src="https://cdn.roots.io/app/uploads/logo-bedrock.svg" height="100">
  </a>
</p>

<p align="center">
  <a href="https://packagist.org/packages/roots/bedrock">
    <img alt="Packagist Installs" src="https://img.shields.io/packagist/dt/roots/bedrock?label=projects%20created&colorB=2b3072&colorA=525ddc&style=flat-square">
  </a>

  <a href="https://packagist.org/packages/roots/wordpress">
    <img alt="roots/wordpress Packagist Downloads" src="https://img.shields.io/packagist/dt/roots/wordpress?label=roots%2Fwordpress%20downloads&logo=roots&logoColor=white&colorB=2b3072&colorA=525ddc&style=flat-square">
  </a>

  <img src="https://img.shields.io/badge/dynamic/json.svg?url=https://raw.githubusercontent.com/roots/bedrock/master/composer.json&label=wordpress&logo=roots&logoColor=white&query=$.require[%22roots/wordpress%22]&colorB=2b3072&colorA=525ddc&style=flat-square">

  <a href="https://github.com/roots/bedrock/actions/workflows/ci.yml">
    <img alt="Build Status" src="https://img.shields.io/github/actions/workflow/status/roots/bedrock/ci.yml?branch=master&logo=github&label=CI&style=flat-square">
  </a>

  <a href="https://twitter.com/rootswp">
    <img alt="Follow Roots" src="https://img.shields.io/badge/follow%20@rootswp-1da1f2?logo=twitter&logoColor=ffffff&message=&style=flat-square">
  </a>
</p>

<p align="center">WordPress boilerplate with Composer, easier configuration, and an improved folder structure</p>

<p align="center">
  <a href="https://roots.io/bedrock/">Website</a> &nbsp;&nbsp; <a href="https://roots.io/bedrock/docs/installation/">Documentation</a> &nbsp;&nbsp; <a href="https://github.com/roots/bedrock/releases">Releases</a> &nbsp;&nbsp; <a href="https://discourse.roots.io/">Community</a>
</p>

## Sponsors

Bedrock is an open source project and completely free to use. If you've benefited from our projects and would like to support our future endeavors, please consider [sponsoring Roots](https://github.com/sponsors/roots).

<div align="center">
<a href="https://carrot.com/"><img src="https://cdn.roots.io/app/uploads/carrot.svg" alt="Carrot" width="120" height="90"></a> <a href="https://wordpress.com/"><img src="https://cdn.roots.io/app/uploads/wordpress.svg" alt="WordPress.com" width="120" height="90"></a> <a href="https://worksitesafety.ca/careers/"><img src="https://cdn.roots.io/app/uploads/worksite-safety.svg" alt="Worksite Safety" width="120" height="90"></a> <a href="https://www.itineris.co.uk/"><img src="https://cdn.roots.io/app/uploads/itineris.svg" alt="Itineris" width="120" height="90"></a> <a href="https://bonsai.so/"><img src="https://cdn.roots.io/app/uploads/bonsai.svg" alt="Bonsai" width="120" height="90"></a>
</div>

## Overview

Bedrock is a WordPress boilerplate for developers that want to manage their projects with Git and Composer. Much of the philosophy behind Bedrock is inspired by the [Twelve-Factor App](http://12factor.net/) methodology, including the [WordPress specific version](https://roots.io/twelve-factor-wordpress/).

- Better folder structure
- Dependency management with [Composer](https://getcomposer.org)
- Easy WordPress configuration with environment specific files
- Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
- Autoloader for mu-plugins (use regular plugins as mu-plugins)

## Getting Started

See the [Bedrock installation documentation](https://roots.io/bedrock/docs/installation/).

## Stay Connected

- Join us on Discord by [sponsoring us on GitHub](https://github.com/sponsors/roots)
- Participate on [Roots Discourse](https://discourse.roots.io/)
- Follow [@rootswp on Twitter](https://twitter.com/rootswp)
- Read the [Roots Blog](https://roots.io/blog/)
- Subscribe to the [Roots Newsletter](https://roots.io/newsletter/)
