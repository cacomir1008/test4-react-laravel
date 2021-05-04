import React, { useEffect, useState } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';

import styled from 'styled-components';
import { Box, Flex, Spacer } from "@chakra-ui/react";


function MyPage() {


    const [users, setUsers] = useState([]);

    // 画面が読み込まれたらgetする
    useEffect(() => {
        getUsers()
    },[])
    
    const getUsers = async () => {
        const token = JSON.parse(api_token);
        const response = await axios.get('/api/user?api_token='.token);
        console.log(response.data)
        setUsers(response.data.users)
    }
    
    return (
        <div>
            <SH1>World</SH1>
        <SDiv>
         {users.map((user) => (
            <div key={user.id}>
            <Box bg="#FED7D7" boxShadow="dark-lg" w="20%" p={4} color="gray">
             <dt>名前</dt>
             <dd>{user.name}</dd>
             <SImage
                src="https://source.unsplash.com/random"
                width= "150px"
                height ="150px"
              />
            </Box>
             <Box bg="#FFF5F5" boxShadow="dark-lg" w="30%" p={4} color="gray">
                <dt>メール</dt>
                <dd>{user.email}</dd>
                <dt>ジェンダー</dt>
                <dd>{user.gender}</dd>
                <dt>誕生日</dt>
                <dd>{user.birthday}</dd>
                <dt>email</dt>
                <dd>{user.email}</dd>
             </Box>
             </div>
                ))}
        </SDiv>
        </div>
    )
}

const SH1 = styled.h1`
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
export default MyPage;
// if (document.getElementById('mypage')) {
//     ReactDOM.render(<MyPage />, document.getElementById('mypage'));
// }
