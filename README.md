# finwo / relay server

This is a simple message list server, meant for small service & discovery messages.

It uses [klein.php](https://github.com/klein/klein.php) for basic routing & arguments.
Storing of messages is done using php's memcached extension, to make sure messages don't survive their default TTL of 30 seconds.
It's been setup to be deployed on [dokku-alt](https://github.com/dokku-alt/dokku-alt), but it should run on almost any server configuration.

-----

### Usage:
Call {domain}/v1/{message}/{box}.{format} to leave a message & to view the current message list.

All of the arguments listed here are required.

-----

### Arguments
- domain: this is the domain you're running the application on
- message: the message you want to leave in the box
- box: the box/group you're applying for.
- format: the format you want to read the messages in.

#### Formats
- json: returns a simple JSON array
- txt: returns the messages in plain text, seperated by newlines `\n`
If you'd like to see more formats supported, you're welcome to contribute

-----

### Contributing

After checking the [Github issues](https://github.com/finwo/temporary-list/issues) and confirming that your request isn't already being worked on, feel free to spawn a new fork of the develop branch & send in a pull request.


The develop branch is merged periodically into the master after confirming it's stable, to make sure the master always contains a production-ready version.

-----

Changelog:
- 2016-05-07 Initial release
