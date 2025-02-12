# Automator

## Coding automation and developer productivity

### HotKey

Download HotKey v2.0 and Put a `.ahk` file for example `default.ahk` inside the directory of `shell:startup` inside run-box `Win+R` path, for example for me its `C:\Users\DELL\AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Startup`. So, inside of this folder put that `default.ahk` file and enter these lines in it:

```

:*:db::
{
    Send("mysql -u root -p{Enter}`n")
}

#!g::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://github.com")
#!y::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://youtube.com")
#!l::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://linkedin.com")
#!f::Run("C:\\Program Files (x86)\Google\Chrome\Application\chrome.exe " "https://facebook.com")

:*:pwdh::
{
	Send(A_WorkingDir)
}


```

The sky is the limit, but here with basic example we see that when someone write alias, or press a keyboard-shortcut, we can run certain commands, programs, etc