import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import styled from 'styled-components';
import { Box, Flex, Spacer } from "@chakra-ui/react";

function MyPage() {
    
 
    return (
        <div>
            <SH1>World</SH1>
        <SDiv>
            <Box bg="#FED7D7" boxShadow="dark-lg" w="20%" p={4} color="gray">
             <dt>名前</dt>
             <dd>Caori</dd>
             <SImage
                src="https://source.unsplash.com/random"
                width= "150px"
                height ="150px"
              />
            </Box>
       
             <Box bg="#FFF5F5" boxShadow="dark-lg" w="30%" p={4} color="gray">
                <dt>メール</dt>
                <dd>test@test.com</dd>
                <dt>TEL</dt>
                <dd>080-4444-3333</dd>
                <dt>会社名</dt>
                <dd>Google</dd>
                <dt>Web</dt>
                <dd>google.com</dd>
             </Box>
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
