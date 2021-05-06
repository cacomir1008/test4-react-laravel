import React, { useEffect, useState } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import styled from 'styled-components';
import { Box, Flex, Spacer,SimpleGrid } from "@chakra-ui/react";

function MyPage() {
    const [user, setUser] = useState([]);

    // 画面が読み込まれたらgetする
    useEffect(() => {
        getUser()
    },[])
    
    const getUser = async () => {
        console.log("URL",`/api/user?api_token=${api_token}`)
         await axios
        .get(`/api/user?api_token=${api_token}`)
        .then( (res) => {
                console.log("user",res.data)
                    setUser(res.data);
                    // response=> console.log('body:',response.data);
                    // response=> console.log('status:', response.status); // 200
                }).catch(error => {
                     console.log('Error',error.response);
                         });
                }
    // const getUsers = async () => {
    //     console.log("token",api_token)
    //     console.log("URL",`/api/user?api_token=${api_token}`)
    //     const response = await axios.get(`/api/user?api_token=${api_token}`);
    //     console.log(response.data)
    //     setUsers(response.data.users)
    // }

    return (
        <div>
            <SH1>My Page</SH1>
        <SDiv>

            <SBox>
             <dt>名前</dt>
             <dd>{user.name}</dd>
             <SImage
                src="https://source.unsplash.com/random"
                width= "150px"
                height ="150px"
              />
            </SBox>
    
             <S2Box>
                <dt>メール</dt>
                <dd>{user.email}</dd>
                <dt>ジェンダー</dt>
                <dd>{user.gender}</dd>
                <dt>誕生日</dt>
                <dd>{user.birthday}</dd>
                <dt>email</dt>
                <dd>{user.email}</dd>
             </S2Box>
      </SDiv>
        </div>
    )
}

const SBox = styled.div`
    background-color:#FED7D7;
    width:20%;
    color:gray;
    box-shadow:2px 2px 4px gray;
`

const S2Box = styled.div`
    background-color:#FFF5F5;
    width:40%;
    color:gray;
    box-shadow:2px 2px 4px gray;

`

const SH1 = styled.h1`
    text-align:center;
    color: palevioletred;
`

const SImage = styled.img`
    border-radius:100%;
`

const SDiv = styled.div`
    display:flex;
    text-align:center;
    justify-content: center;
`
// export default MyPage;
if (document.getElementById('mypage')) {
    ReactDOM.render(<MyPage />, document.getElementById('mypage'));
}
