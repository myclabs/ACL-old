# ACL

[![Build Status](https://secure.travis-ci.org/myclabs/ACL.png)](http://travis-ci.org/myclabs/ACL)

Access control based on string paths.

    ALLOW User(123) TO VIEW User(123)
    ALLOW User(123) TO EDIT User(123)

    ALLOW Role(1) TO ADD User
    ALLOW Role(1) TO * User

    ALLOW Role(1) TO VIEW Folder(1)*
    ALLOW Role(2) TO VIEW Folder(1)*
    ALLOW Role(2) TO EDIT Folder(1)*

    ALLOW * TO VIEW Article
    ALLOW * TO VIEW Article/Comment
    ALLOW Role(1) TO ADD Article
    ALLOW Role(1) TO EDIT Article
    ALLOW Role(2) TO ADD Category(1)/Article
    ALLOW Role(2) TO EDIT Category(1)/Article

    ALLOW Role TO REPORT Article/Comment

    MATCH "Category(1)/Article(1)" AGAINST "Category(1)/Article"
    MATCH "Category(1)/Article(1)" AGAINST "Category/Article"
    MATCH "Category(1)/Article(1)" AGAINST "Article"
    MATCH "Category(1)/Article(1)" AGAINST "Category*"

    MATCH "Category(1)/Article(1)" AGAINST "Category(1)/Article(*)"
    MATCH "Category(1)/Article(1)" AGAINST "Category(*)/Article(*)"
    MATCH "Category(1)/Article(1)" AGAINST "Article(*)"
    MATCH "Category(1)/Article(1)" AGAINST "Category(*)*"

API:

    $aclService->allow("User(*)", Action::VIEW(), "Article(*)");

    $aclService->isAllowed("User(12)", Action::VIEW(), "Article(13)");
