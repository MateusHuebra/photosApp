<?php

namespace Service\Language;

class English {
    
    const STRINGS = [
        'acronym' => 'en',
        'authentication' => [
            'usernameOrEmail' => 'Username or Email',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'login' => 'log in',
            'signup' => 'sign up',
            'updateInfo' => 'update info',
            'changePassword' => 'change password',
            'ifYouHaventAnAccount' => 'if you haven\'t an account',
            'ifYouHaveAnAccount' => 'if you have an account'
        ],
        'interface' => [
            'language' => 'Language',
            'home' => 'Home',
            'profile' => 'Profile',
            'logout' => 'Logout',
            'about' => 'About',
            'copyLink' => 'copy link',
            'delete' => 'delete',
            'deletePost' => 'deletePost',
            'addAComment' => 'Add a comment',
            'post' => 'post',
            'posts' => 'posts',
            'edit' => 'edit',
            'follower' => 'follower',
            'followers' => 'followers',
            'following' => 'following',
            'follow' => 'follow',
            'areYouSureYouWantToDeleteThisPost' => 'Are you sure you want to delete this post?',
            'areYouSureYouWantToLogout' => 'Are you sure you want to logout?',
            'cancel' => 'cancel',
            'close' => 'close',
            'yes' => 'yes',
            'selectPicture' => 'Select picture',
            'changePicture' => 'change picture',
            'caption' => 'Caption',
            'seeMore' => 'see more',
            'search' => 'search',
            'noPostsToShow' => 'No posts to show',
            'searchForPeopleToFollow' => 'Search for people to follow'
        ],
        'toasts' => [
            'infoUpdated' => 'info updated',
            'invalidCredentials' => 'Invalid credentials',
            'usernameIsEmpty' => 'Username is empty',
            'usernameIsTooLong' => 'Username is too long / max: 16 characters',
            'usernameCannotHaveSpecialCharacters' => 'Username cannot have special characters / just letters, numbers and underscore',
            'usernameMustBeginsWithALetter' => 'Username must begins with a letter',
            'isAReservedWord' => 'is a reserved word',
            'usernameAlreadyTaken' => 'Username already taken',
            'emailIsEmpty' => 'Email is empty',
            'emailIsTooLong' => 'Email is too long / max: 128 characters',
            'itMustBeAnEmail' => 'It must be an email',
            'emailAlreadyBeingUsed' => 'Email already being used',
            'passwordIsEmpty' => 'Password is empty',
            'passwordIsTooLong' => 'Password is too long / max: 16 characters',
            'passwordIsTooShort' => 'Password is too short / min: 4 characters',
            'yourCommentIsEmpty' => 'Your comment is empty',
            'yourCommentIsTooLong' => 'Your comment is too long / max: 255 characters',
            'yourCommentCannotStartOrEndWithASpace' => 'Your comment cannot start or end with a space',
            'profilePictureChanged' => 'Profile picture changed!',
            'youShouldBeLoggedInToSeeThatPage' => 'You should be logged in to see that page',
            'noFileWasSent' => 'No file was sent',
            'yourFileIsNotAPNGJPGorJPEG' => 'Your file is not a PNG, JPG or JPEG',
            'yourFIleIsTooLarge' => 'Your file is too large',
            'yourImageIsNotASquare' => 'Your image is not a square',
            'somethingGoneWrong' => 'Something gone wrong',
            'yourPictureWasPosted' => 'Your picture was posted!',
            'copiedToTheClipboard' => 'copied to the clipboard',
            'yourPostHasBeenDeleted' => 'your post has been deleted'
        ],
        'posts' => [
            'like' => 'like',
            'likes' => 'likes',
            'comment' => 'comment',
            'comments' => 'comments'
        ]
    ];

    static function get(string $key) {
        $keys = explode('.', $key);
        $strings = self::STRINGS;
        foreach ($keys as $key) {
            $strings = $strings[$key];
        }
        return $strings;
    }

    static function getAll() {
        return self::STRINGS;
    }

}