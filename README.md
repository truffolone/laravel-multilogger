# laravel-multilogger
A simple package that allows you to write logs into multiple files

You just have to install the composer package and call 

```
MultiLogger::log('Message Text', 'filename', 'level', 'channel');
```

Message Text if the only field needed

For example, if I write

```
MultiLogger::log('A prisoner escaped!', 'prisoners', 'emergency', 'prison');
```

You will find a message into storage/logs/prisoners.log with level 'emergency' in channel 'prison' with text 'A prisoner has escaped!'

If there is an error, false is returned anc you can check the exception message with

```
MultiLogger::getErrorMessage();
```

which returns a string with the error message.

The package is incredibly basic, you should use channels and create what you need in the logs config of your application.